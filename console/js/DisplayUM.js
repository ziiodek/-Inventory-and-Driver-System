const DisplayUM = () =>{
    
    fetch("json/UM.json")
    .then(response => {
       return response.json();
    })
    .then(data => {

    for(let i=0;i<data.UM.length;i++){
            console.log(data.UM[i]);
        }

    });

};


DisplayUM();