
    <section class="p-4" id="api-worldcountry">
        <div class="container">
            <h2 class="text-start mb-4">World Country API</h2>
            <div class="accordion accordion-flush" id="worldcountry" >
                <!-- item 1  -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1"  >
                            Get All Countries
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry</span></code>
                                    <p class="m-1">
                                        Provide Countries information include:'Title','ISO_Alpha3_Code', 'M49_Code', 'Region', 'Countinent'<br>
                                        See <a href="#flush-heading2">Filters</a> for more retrieve options.<br>
                                        See <a href="#flush-heading8">Sort</a> for more sorting options. Default sort by country name.<br>
                                        See <a href="#flush-heading10">Paging</a> for more paging options.<br>
                                        See <a href="#flush-heading11">Fields</a> to select display fields of the retrieved data.  
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" >
                            [Filters] Get limited number of Countries 
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?limit=20</code>
                                    <p class="m-1">Get the 20 records from the retrieved result</p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?limit=20">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3">
                            [Filters] Get All Countries By Matching Name Pattern (Fuzzy Search)
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?name=st&limit=20</code>
                                    <p class="m-1">
                                        Get all countries, which country name contains pattern 'st', and display 20 record of the result
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?name=st&limit=20">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4">
                            [Filters] Get All Countries By Matching region (Fuzzy Search)
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?region=africa</code>
                                    <p class="m-1">Get all countries, which region contains pattern 'africa'</p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?region=africa">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5">
                         [Filters] Get All Countries By Matching countinent (Fuzzy Search)
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?countinent=asia</code>
                                    <p class="m-1">Get all countries, which countinent contains pattern 'asia'</p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?countinent=Asia">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6">
                         [Filters] Get All Countries By Matching ISO_Alpha3_Code Pattern (Fuzzy Search)
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?alphaCode=a</code>
                                    <p class="m-1">Get all countries, which alphaCode contains pattern 'a'</p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?alphaCode=a">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse7">
                         [Filters] Get Country By Matching the M49_Code
                        </button>
                    </h2>
                    <div id="flush-collapse7" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?m49Code=24</code>
                                    <p class="m-1">Get the country, which m49Code is 24</p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?m49Code=24">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 8 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse8">
                         [Sort] Sort the retrieved Countries By region, and m49Code Ascending
                        </button>
                    </h2>
                    <div id="flush-collapse8" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?sort=region,m49Code</code>
                                    <p class="m-1">
                                        Get all the countries, and sort by region, then m49Code in ascending order.
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?sort=region,m49Code">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 9 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading9">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse9">
                         [Sort] Sort the retrieved Countries By region Ascending, and m49Code Descending
                        </button>
                    </h2>
                    <div id="flush-collapse9" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry?sort=region,-m49Code</code>
                                    <p class="m-1">
                                        Get all the countries, and sort by region in ascending order, then m49Code in descending order
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?sort=region,-m49Code">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 10 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading10">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse10">
                            [Paging] Set up paging to the retrieved Countries 
                        </button>
                    </h2>
                    <div id="flush-collapse10" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9" >
                                    <code class="m-1">/api/v1/worldcountry?limit=10&page=2</code>
                                    <p class="m-1">
                                        Initialize 10 records per page.<br>
                                        Get all the countries, only display the 2nd page records.
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?limit=10&page=2">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 11 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading11">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse11">
                            [Fields] Select fields of the retrieved data to display 
                        </button>
                    </h2>
                    <div id="flush-collapse11" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9" >
                                    <code class="m-1">/api/v1/worldcountry?fields=countryName,m49Code</code>
                                    <p class="m-1">
                                        Get all the countries, only display the country name and m49Code.<br>
                                        Display "_id" by default.
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry?fields=countryName,m49Code">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 12 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading12">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse12">
                            Get Country By Id
                        </button>
                    </h2>
                    <div id="flush-collapse12" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry/62d9a3671b970c63a58b749e</code>
                                    <p class="m-1">Get the country which _id is 62d9a3671b970c63a58b749e</p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/api/v1/worldcountry/62d9a3671b970c63a58b749e">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 13 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading13">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse13">
                            [AccessToken] Create a new Country Record
                        </button>
                    </h2>
                    <div id="flush-collapse13" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry/</code>
                                    <p class="m-1">
                                        Create a new Country Record.<br>
                                        Required: <br>
                                        - Header: API access Token, Contact author to get token.<br>
                                        - Method: POST.<br>
                                        - 'Country' fields:<br>
                                            {
                                                "countryName": [String],
                                                "alphaCode":[String],
                                                "m49Code":[int],
                                                "region":[String],
                                                "countinent":[String] 
                                            }
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/#about">Request Token</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 14 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading14">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse14">
                            [AccessToken] Update Country Record
                        </button>
                    </h2>
                    <div id="flush-collapse14" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry/{id}</code>
                                    <p class="m-1">
                                        Update Country Record.<br>
                                        Required: <br>
                                        - Header: API access Token, Contact author to get token.<br>
                                        - Method: PATCH.<br>
                                        - 'Country' fields:<br>
                                            {
                                                "countryName": [String],
                                                "alphaCode":[String],
                                                "m49Code":[int],
                                                "region":[String],
                                                "countinent":[String] 
                                            }
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/#about">Request Token</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 15 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading14">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse15">
                            [AccessToken] Delete a Country Record
                        </button>
                    </h2>
                    <div id="flush-collapse15" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/api/v1/worldcountry/{id}</code>
                                    <p class="m-1">
                                        Update Country Record.<br>
                                        Required: <br>
                                        - Header: API access Token, Contact author to get token.<br>
                                        - Method: DELETE.<br>
                                    </p>
                                </div>
                                <div class="col-3">
                                    <a href="https://www.casedeploy.com/#about">Request Token</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
