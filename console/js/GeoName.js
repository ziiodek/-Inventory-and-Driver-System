class GeoName{

    getCountries(){

        this.file="../../json/GeoNameUtil.json";

        fetch(this.file)
        .then(response => {
            return response.json();
        })
        .then(data =>{
            this.username=data[0].username;
            this.countriesURL = data[0].countries_url;
            this.statesURL = data[0].states_url;
            //console.log(this.username);
            //console.log( this.countriesURL);

            this.getCountriesHelper();

            
        })

        

    }

    getCountriesHelper(){

       

        let completeURL = this.countriesURL+"?username="+this.username;
        //console.log(completeURL);
        fetch(completeURL)
        .then(response =>{
            return response.json();
        })
        .then(data => {
            this.countryList = new Array();
            this.populateCountriesList(0,data);
            
            //console.log(this.countryList.length);
            let size = this.countryList.length;
            DisplayCountries(size-1,this.countryList);
            

        })

    }

    populateCountriesList(index,data){
        if(index >= data.geonames.length){
            return this.countryList;
        }

        let countryId = data.geonames[index].geonameId;
        let countryName = data.geonames[index].countryName;

        let country = {
            Id: countryId,
            Name: countryName

        };

        this.countryList[index] = country;

        return this.populateCountriesList(index+1,data);



    }

    getCountryStates(countryId){
        this.file="../../json/GeoNameUtil.json";

        fetch(this.file)
        .then(response => {
            return response.json();
        })
        .then(data =>{
            this.username=data[0].username;
            this.countriesURL = data[0].countries_url;
            this.statesURL = data[0].states_url;
            
            this.getCountryStatesHelper(countryId);
        })

    }


    getCountryStatesHelper(countryId){

        let completeURL = this.statesURL+"?geonameId="+countryId+"&username="+this.username;
        //console.log(completeURL);
        fetch(completeURL)
        .then(response =>{
            return response.json();
        })
        .then(data => {
            this.stateList = new Array();
            this.populateStatesList(0,data);
            
            //console.log(this.stateList);
            
            let size = this.stateList.length;
            
            DisplayStates(size-1,this.stateList);

        })

    }


    populateStatesList(index,data){
        if(index >= data.geonames.length){
            return this.stateList;
        }

        let stateId = data.geonames[index].geonameId;
        let stateName = data.geonames[index].name;

        let state = {
            Id: stateId,
            Name: stateName

        };

        this.stateList[index] = state;

        return this.populateStatesList(index+1,data);



    }

  

}


