const DisplayStates = (index,stateList) =>{
    if(index <= 0){
        return "";

    }

    let state = stateList[index];

    const selectField = document.getElementById('state');
    let optionField = document.createElement("option");
    optionField.text = state.Name;
    optionField.value = state.Name;
    selectField.add(optionField);

    return DisplayStates(index-1,stateList);



};