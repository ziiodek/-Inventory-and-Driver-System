const DisplayUMW = () =>{
    fetch("json/UMW.json")
    .then(response => {
        return response.json();

    })
    .then(data=> {
        for(let i=0;i<data.UMW.length;i++){
            console.log(data.UMW[i]);

        }

    })

};


DisplayUMW();