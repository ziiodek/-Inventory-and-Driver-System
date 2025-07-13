const DisplayOperationTypes = () =>{
    fetch("json/OperationTypes.json")
    .then(response => {
        return response.json();
    })
    .then(data => {
        for(let i=0;i<data.OperationTypes.length;i++){
            console.log(data.OperationTypes[i]);
        }

    })

};

DisplayOperationTypes();