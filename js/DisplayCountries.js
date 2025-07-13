const DisplayCountries = (index,countryList) =>{
    if(index <= 0){
        return "";

    }

    let country = countryList[index];

    const selectField = document.getElementById('country');
    let optionField = document.createElement("option");
    optionField.text = country.Name;
    optionField.value = country.Id;
    selectField.add(optionField);

    return DisplayCountries(index-1,countryList);



};