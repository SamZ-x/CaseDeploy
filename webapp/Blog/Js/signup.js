$(function(ev){
    //load regions
    GetRegions();
});

/*****************************
Function Name: GetRegions
Description: get the worldcountry data from worldcountryAPI
Parameters: no parameter
Return: no return
*****************************/
function GetRegions() {
    $.getJSON("https://www.casedeploy.com/api/v1/worldcountry", (response)=>{
        console.log(response['data']);
        let result = response['data'];
        let regions = [];
        for(const item of result)
        {
            let kvp = {
            'm49Code' : item['m49Code'],
            'country' : item['countryName']
            };
            regions.push(kvp);
        }

        console.log(regions);
        AddRegionOptions(regions);
    });
}

/*****************************
Function Name: AddRegionOptions
Description: add country data to the option
Parameters: country data array
Return: no return, display country info in option
*****************************/
function AddRegionOptions(regionsArr){
    
    let selectItem = $('select[name=Region]'); 

    for(const item of regionsArr){
        let optionItem = document.createElement('option');
        optionItem.setAttribute('value', item['m49Code']);
        optionItem.innerHTML = item['country'];
        selectItem.append(optionItem);
    }
}