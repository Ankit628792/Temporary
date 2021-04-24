
    const request = require("request");
const cheerio = require("cheerio");

let lastBallCommentary = "https://www.espncricinfo.com/series/ipl-2020-21-1210595/delhi-capitals-vs-mumbai-indians-final-1237181/ball-by-ball-commentary";
// let highestWicketTaker = "https://www.espncricinfo.com/series/ipl-2020-21-1210595/delhi-capitals-vs-mumbai-indians-final-1237181/full-scorecard"
let highestWicketTaker = "https://www.tamsenhorton.com/products/training-wheels?page=1"

request(highestWicketTaker, cb);

function cb(error, response, body) {
  parseBody(body);
}

function parseBody(body) {
    let $ = cheerio.load(body); // Holds the data of Body
    
   
address = `.Collapsible__contentInner .table.bowler tbody`  // Holds the location of tbody tag
var arr = [];
// apply a loop to all the <tr> in the <tbody>
for (let index = 0; index < 6; index++) {
    let wicket = $(`${address} tr:nth-child(${index+1}) td:nth-child(5)`).html(); //exect adress of the wicket data
    arr[index] = wicket;  // stores the all wicket data in form of array
}
console.log(`Wicket array : [${arr}]`);  // prints the array of wicket
var max_wicket = Math.max(...arr);  //find the max element in the array and passing the array using spread operator
var wicket_index = arr.indexOf(`${max_wicket}`);  //index of max wicket

var name =$(`${address} tr:nth-child(${wicket_index + 1}) td a:first`).text(); //find the name of the player with highest wicket in the table
console.log(`Maximum wicket was credited by : ${name}`); // name of player
console.log(`With maximum wicket : ${max_wicket}`); // max wicket



 // console.log($('.best-player-name').text());
  // i will get html here of cricinfo ipl home page !!
    // const data = `.Collapsible__contentInner .table.bowler tbody`
//   let aTagKaData = ch(data).text();
//   console.log(aTagKaData);


// let items = lis.split('</td>').join(' ').split('<td>').join(" ").split(" ").join("\n");

// console.log(items)

// items.forEach((e) => {
//     if (e) {
//         console.log(e.replace(/(\s+)/g, ''),"\n");
//     }
// });
}