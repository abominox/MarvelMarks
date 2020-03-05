const puppeteer = require('puppeteer')
const fs = require('fs')
const md5 = require('md5')
const AWS = require('aws-sdk')
require('dotenv').config()

module.exports = {
    getThumbnail,
    getPreview,
    uploadS3
}

var browser
var page

async function initBrowser() {
    browser = await puppeteer.launch({
        args: ['--no-sandbox']
    })
    page = await browser.newPage()
    page.setViewport({
        width: 1920,
        height: 1080
    })
}

async function getThumbnail(url) {
    filename = md5(url)
    console.log('MD5 filename is: ' + filename)

    await page.goto(url, { timeout: 10 }).then(
        await page.screenshot({
            path: filename,
            fullPage: false
        })
    ).catch((err) => {
        console.log('Unable to navigate to page: ' + err)
    });

    await browser.close()
    return filename
}

// get video frame or other preview element, if applicable
function getPreview(url) {
    // todo
}

function uploadS3(filename) {
    const s3 = new AWS.S3({
        accessKeyId: process.env.ID,
        secretAccessKey: process.env.KEY
    })

    const params = {
        Bucket: process.env.BUCKET,
        Key: filename,
        Body: fs.readFileSync(filename)
    }

    s3.upload(params, function (err, data) {
        console.log('File uploaded successfully! --- ' + data.location)
        try {
            fs.unlinkSync(filename)
        }
        catch (err) {
            console.log(err)
            console.log('Unable to remove file!')
        }
    })
}

initBrowser()
getThumbnail('https://plex.com').then(thumbnail => {
    uploadS3(thumb)
}).catch((err) => {
    console.log('TEST: ' + err)
})
//uploadS3(thumb)
