const onChangeEvent__handler = (geoName) => {

    
    const countryDropDown = document.getElementById('country');
    countryDropDown.addEventListener('change',()=>{
        const countries = document.getElementById("country");
        console.log(countries);
        let selectedCountryId = countries.options[countries.selectedIndex].value;
        let selectedCountryName = countries.options[countries.selectedIndex].text;
        //console.log(selectedCountry);
        const selectedCountryId__hiddenBox = document.getElementById("selectedCountryId");
        const selectedCountryName__hiddenBox = document.getElementById("selectedCountryName");
        selectedCountryId__hiddenBox.value = selectedCountryId;
        selectedCountryName__hiddenBox.value = selectedCountryName;

        ClearStates();
        geoName.getCountryStates(selectedCountryId);


    });

};