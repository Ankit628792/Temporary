const fs = require('fs');

let pendingPromise = fs.promises.readFile('./f2.txt');
console.log(pendingPromise);

pendingPromise.then((data) => {
    console.log(data + "")
})

pendingPromise.catch((error) => {
    console.log("catch ");
    console.log(error);
})