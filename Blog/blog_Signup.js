var _url = "http://api.countrylayer.com/v2/all";

$(function(ev){

    //load the region name and show in the drop down list
    //LoadRegion();
    
    //tmp region list
    TmpRegionList();


});

function TmpRegionList()
{
    let countrylist = {};
    countrylist['name'] = 'Canada';
    countrylist['areacode'] = '1';

    let _option = document.createElement('option');
    $(_option).text(countrylist['name']);
    $(_option).val(countrylist['areacode']);
    $('select[name="Region"]').append(_option);

}


function LoadRegion(){

    let _DataSet = {};
    _DataSet['access_key'] = "a49ff1f930cd8fda1c526a7a6260dbf8";
    AjaxRequest(_url, 'GET', _DataSet, 'JSON', GetRegionSuccess, ErrorHandler);
}

function AjaxRequest(url, type, dataSet, dataType, successFunction, errorFunction)
{
    let ajaxOptions = {};
    ajaxOptions['url'] = url;
    ajaxOptions['type'] = type;
    ajaxOptions['data'] = dataSet;
    ajaxOptions['datatype'] = dataType;
    ajaxOptions['success'] = successFunction;
    ajaxOptions['error'] = errorFunction;
    $.ajax(ajaxOptions);
}

function GetRegionSuccess(SuccessRespond, TextStatus)
{
    console.log(SuccessRespond);
    console.log(TextStatus);
    //later use the data to inital the list

    BuildRegionList(SuccessRespond);
}

function BuildRegionList(ResponseObject)
{
    //build 
    let region = $('select[name = "Region"]');
    let index = 0;
    for(const item of ResponseObject)
    {
        let _option = document.createElement('option');
        let _OptionObj = $(_option);
        _OptionObj.text(item['name']);
        _OptionObj.val(index);
        ++index;
        region.append(_OptionObj);
    }   
}


function ErrorHandler(requestor, textStatus, errorThrown )
{
    let errorString = "Result: " + textStatus + "-" + errorThrown;
    console.log(requestor);
    console.log(errorString);
}