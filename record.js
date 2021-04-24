
    const request = require("request");
    const cheerio = require("cheerio");
    var fs = require('fs');
    
    // let lastBallCommentary = "https://www.espncricinfo.com/series/ipl-2020-21-1210595/delhi-capitals-vs-mumbai-indians-final-1237181/ball-by-ball-commentary";
    // let highestWicketTaker = "https://www.espncricinfo.com/series/ipl-2020-21-1210595/delhi-capitals-vs-mumbai-indians-final-1237181/full-scorecard"
    
    let ranking = `https://worldathletics.org/world-rankings/100m/men`;
    request(ranking, cb);
    
    function cb(error, response, body) {
      parseBody(body);
    }

    const record = [];
    
    function parseBody(body) {
        let $ = cheerio.load(body); // Holds the data of Body

      const  address = `.records-table tbody tr`
      console.log($(`${address}`).length)
      
      for(let i=1; i<= $(`${address}`).length ; i++){
      const rank = $(`.records-table tbody tr:nth-child(${i}) td:nth-child(1)`).text();
      const competitor = $(`${address}:nth-child(${i}) td:nth-child(2)`).text();
      const dob = $(`${address}:nth-child(${i}) td:nth-child(3)`).text();
      const nation = $(`${address}:nth-child(${i}) td:nth-child(4)`).text();
      const score = $(`${address}:nth-child(${i}) td:nth-child(5)`).text();


      //write data
// if(!fs.existsSync(`./ak.json`)){
//     fs.writeFileSync('./ak.json', JSON.stringify([]));
// }
// else{
      let rdata = JSON.parse(fs.readFileSync('records.json'));
      let obj = {
        rank : rank.trim(),
        competitor: competitor.trim(),
        dob: dob.trim(),
        nation: nation.trim(),
        score: score.trim(),
        eventlist: '100m'
      }
      rdata.push(obj);
      fs.writeFileSync('records.json',JSON.stringify(rdata));
    //   }

    //   record.push({
    //       "rank" : rank,
    //        "competitor": competitor,
    //        "dob": dob,
    //        "nation": nation,
    //        "score": score,
    //        "eventlist": '100m'
    //   })
    }
    // console.log(record);
    }    