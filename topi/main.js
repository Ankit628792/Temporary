const express = require('express');
const app = express();
const path = require('path');
const data = require('./job.json');

app.use(express.json())
app.use(express.urlencoded({extended: false}))

app.use(express.static(static_path));
app.set("view engine", "hbs");



const puppeteer=require("puppeteer");
const request=require("request");
const cheerio=require("cheerio");
const fs=require("fs");
const requestUrl=require("./scrap");
let count=0;
let filename;

(async function(){
    let browser =await puppeteer.launch({
        headless:false,
        defaultViewport:null,
        args:["--start-maximized"]
    });
    let skills=["Java","Node","WordPress","Python","unity","full stack developer","machine learning","c#","data science","android"];
    let pages = await browser.pages();
    let tab=pages[0];
    for(let i=0;i<skills.length;i++){
         giveAllData(browser,skills[i]);
         await tab.waitForTimeout(4000);
         
    }
})();

async function giveAllData(browser,skill){
    let tab=await browser.newPage();
    await tab.goto("https://in.indeed.com/jobs-in-India");
    await tab.type('input[id="what"]',skill);
    await tab.click('input[class="input_submit"]');
    await tab.waitForTimeout(5000);
    let url=  await tab.url();
    await requestUrl(url,skill);
    await tab.waitForTimeout(5000);
    tab.close();
}






//server related stuff


app.get('/', (req,res) => {
    res.render("index");
  });
  
  app.get('/jobs', (req,res) => {
    try {
      res.status(200).send(data);
    } catch (error) {
      res.status(400).send(error)
    }
  });
  
  
  app.listen(port, () => {
    console.log(`Server is Running at Port No :  ${port}`)
  })
  


