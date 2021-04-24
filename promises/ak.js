
var fs = require('fs');


//write data
// if(!fs.existsSync(`./ak.json`)){
//     fs.writeFileSync('./ak.json', JSON.stringify([]));
// }
// else{
    let rdata = JSON.parse(fs.readFileSync('./ak.json'));
    let obj = {
        name: 'ANkit',
        class: 'CSE'
    }
    rdata.push(obj);
    fs.writeFileSync('./ak.json',JSON.stringify(rdata));
// }

///read data 

let readdata = JSON.parse(fs.readFileSync('./ak.json'));
console.log(readdata);
