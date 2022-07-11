
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
                                    <code class="m-1">/country/getAllCountries</code>
                                    <p class="m-1">Provide Countries information include:'Title','ISO_Alpha3_Code',
                                        'M49_Code','Region','Countinent'</p>
                                </div>
                                <div class="col-3">
                                    <a href="http://www.casedelploy.com/CaseDeploy/APIs/worldcountry/api/country/getAllCountries">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" >
                            Get Single County By Alpha 3 Code
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/country/getSingleCountyByAlphaCode?alphaCode=ALA</code>
                                    <p class="m-1">Get a single country data with provided ISO Alpha3 Code parameter</p>
                                </div>
                                <div class="col-3">
                                    <a href="http://www.casedelploy.com/CaseDeploy/APIs/worldcountry/api/country/getSingleCountyByAlphaCode?alphaCode=ALA">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3">
                            Get Single County By M49 Code
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/country/getSingleCountyByM49Code?m49Code=248</code>
                                    <p class="m-1">Get a single country data with provided M49 Code parameter</p>
                                </div>
                                <div class="col-3">
                                    <a href="http://www.casedelploy.com/CaseDeploy/APIs/worldcountry/api/country/getSingleCountyByM49Code?m49Code=248">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4">
                            Get Single County By Countinent
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/country/getCountyByCountinent?countinentTitle=asia</code>
                                    <p class="m-1">Provide countries data grouped by countinent</p>
                                </div>
                                <div class="col-3">
                                    <a href="http://www.casedelploy.com/CaseDeploy/APIs/worldcountry/api/country/getCountyByCountinent?countinentTitle=asia">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5">
                            Get Single County By Region
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse"  data-bs-parent="#worldcountry">
                        <div class="accordion-body py-1">
                            <div class="row text-start">
                                <div class="col-9">
                                    <code class="m-1">/country/getCountyByRegion?regionTitle=Eastern Asia</code>
                                    <p class="m-1">Provide countries data grouped by region</p>
                                </div>
                                <div class="col-3">
                                    <a href="http://www.casedelploy.com/CaseDeploy/APIs/worldcountry/api/country/getCountyByRegion?regionTitle=Eastern Asia">JSON</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
