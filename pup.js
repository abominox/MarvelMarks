const puppeteer = require('puppeteer')

async function run (url) {
    const browser = await puppeteer.launch({
        args: ['--no-sandbox']
    });
    const page = await browser.newPage();
    await page.setViewport({
        width: 1920,
        height: 1080
    })
    await page.goto(url);
    await page.waitFor(8000)

    await page.screenshot({path: 'screenshot.png'});
    browser.close();
}

run('http://4chan.org');