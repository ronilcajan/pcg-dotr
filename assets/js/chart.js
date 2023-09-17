$(document).on('change', '#select-chart', function(){  
    var chart = $(this).val(); 
    var items = $('#chart-container .item')  
    items.filter('[data-chart]').addClass('hidden')
    $('#chart-container .item[data-chart="'+chart+'"]').removeClass('hidden')  
}); 
 
marep_chart()
var chart_marep;
function marep_chart(arr = new Array()){ 
    $.ajax({ 
        url:  BASE_URL+'filter_marep',
        method: "post",  
        data: arr,
        dataType: "json",
        success: function (data) {  
            
            var options = {
                chart: {
                    type: 'area',  
                    height: '350', 
                },  
                markers: {
                    size: 5,
                }, 
                grid: {   
                    borderColor: '#111',
                    strokeDashArray: 7, 
                    xaxis: {
                        lines: {
                            show: false, 
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                        }
                    },
                }, 
                series: data.series,
                xaxis: { 
                    categories:  data.categories
                },  
                yaxis: {
                    title: {
                        text: '# of entry '
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " entry"
                        }
                    }
                }
            }
            chart_marep = new ApexCharts(document.querySelector("#marep-chart"), options);
            chart_marep.render(); 
        },
        error: function (xhr, status, error) { 
            console.info(xhr.responseText);
        }
    }); 
}
$('#marep-filter-form').on('submit', function(e){
    e.preventDefault();
    var filter_val = $(this).serializeArray()
    chart_marep.destroy();
    marep_chart(filter_val);
})


marsaf_chart()
var chart_marsaf;
function marsaf_chart(arr = new Array()){ 
    $.ajax({ 
        url:  BASE_URL+'filter_marsaf',
        method: "post",  
        data: arr,
        dataType: "json",
        success: function (data) {  
            
            var options = {
                chart: {
                    type: 'area',  
                    height: '350', 
                },  
                markers: {
                    size: 5,
                }, 
                grid: {   
                    borderColor: '#111',
                    strokeDashArray: 7, 
                    xaxis: {
                        lines: {
                            show: false, 
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                        }
                    },
                }, 
                series: data.series,
                xaxis: { 
                    categories:  data.categories
                },  
                yaxis: {
                    title: {
                        text: '# of entry '
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " entry"
                        }
                    }
                }
            }
            chart_marsaf = new ApexCharts(document.querySelector("#marsaf-chart"), options);
            chart_marsaf.render(); 
        },
        error: function (xhr, status, error) { 
            console.info(xhr.responseText);
        }
    }); 
}


marsar_chart()
var chart_marsar;
function marsar_chart(arr = new Array()){ 
    $.ajax({ 
        url:  BASE_URL+'marsar/filter_marsar',
        method: "post",  
        data: arr,
        dataType: "json",
        success: function (data) {  
            
            var options = {
                chart: {
                    type: 'area',  
                    height: '350', 
                },  
                markers: {
                    size: 5,
                }, 
                grid: {   
                    borderColor: '#111',
                    strokeDashArray: 7, 
                    xaxis: {
                        lines: {
                            show: false, 
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                        }
                    },
                }, 
                series: data.series,
                xaxis: { 
                    categories:  data.categories
                },  
                yaxis: {
                    title: {
                        text: '# of entry '
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " entry"
                        }
                    }
                }
            }
            chart_marsar = new ApexCharts(document.querySelector("#marsar-chart"), options); 
            chart_marsar.render();
        },
        error: function (xhr, status, error) { 
            console.info(xhr.responseText);
        }
    }); 
}
$('#marsar-filter-form').on('submit', function(e){
    e.preventDefault();
    var filter_val = $(this).serializeArray()
    chart_marsar.destroy();
    marsar_chart(filter_val);
})

marslec_chart()
var chart_marslec;
function marslec_chart(arr = new Array()){ 
    $.ajax({ 
        url:  BASE_URL+'marslec/filter_marslec',
        method: "post",  
        data: arr,
        dataType: "json",
        success: function (data) {  
            
            var options = {
                chart: {
                    type: 'area',  
                    height: '350', 
                },  
                markers: {
                    size: 5,
                }, 
                grid: {   
                    borderColor: '#111',
                    strokeDashArray: 7, 
                    xaxis: {
                        lines: {
                            show: false, 
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                        }
                    },
                }, 
                series: data.series,
                xaxis: { 
                    categories:  data.categories
                },  
                yaxis: {
                    title: {
                        text: '# of entry '
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " entry"
                        }
                    }
                }
            }
            chart_marslec = new ApexCharts(document.querySelector("#marslec-chart"), options); 
            chart_marslec.render();
        },
        error: function (xhr, status, error) { 
            console.info(xhr.responseText);
        }
    }); 
}
$('#marslec-filter-form').on('submit', function(e){
    e.preventDefault();
    var filter_val = $(this).serializeArray()
    chart_marslec.destroy();
    marslec_chart(filter_val);
})

urban_marsar_chart()
var chart_urban_marsar;
function urban_marsar_chart(arr = new Array()){ 
    $.ajax({ 
        url:  BASE_URL+'urban_marsar/filter_urban_marsar',
        method: "post",  
        data: arr,
        dataType: "json",
        success: function (data) {  
            
            var options = {
                chart: {
                    type: 'area',  
                    height: '350', 
                },  
                markers: {
                    size: 5,
                }, 
                grid: {   
                    borderColor: '#111',
                    strokeDashArray: 7, 
                    xaxis: {
                        lines: {
                            show: false, 
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true,
                        }
                    },
                }, 
                series: data.series,
                xaxis: { 
                    categories:  data.categories
                },  
                yaxis: {
                    title: {
                        text: '# of entry '
                    }
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " entry"
                        }
                    }
                }
            }
            chart_urban_marsar = new ApexCharts(document.querySelector("#urban_marsar-chart"), options); 
            chart_urban_marsar.render();
        },
        error: function (xhr, status, error) { 
            console.info(xhr.responseText);
        }
    }); 
}
$('#urban_marsar-filter-form').on('submit', function(e){
    e.preventDefault();
    var filter_val = $(this).serializeArray()
    chart_urban_marsar.destroy();
    urban_marsar_chart(filter_val);
})

$(document).ready(function(){
    $.ajax({ 
        url:  BASE_URL+'dashboard/report_status',
        type: "post",  
        dataType: "json",
        success: function (response) {  
            Morris.Donut({
                element: 'order-status-chart',
                data: [{
                    label: "MAREP",
                    value: response.marep
            
                }, {
                    label: "MARSAF",
                    value: response.marsaf
                }, {
                    label: "MARSAR",
                    value: response.marsar
                }, {
                    label: "MARSLEN",
                    value: response.marslec
                }, {
                    label: "URBAN MARSAR", 
                    value: response.urban_marsar
                }],
                resize: true,
                colors: ['#0E83CC', '#E74A25', '#2FCC71', '#FFB136', '#00BBD9']
            });
            
        },
        error: function (xhr, status, error) { 
            console.info(xhr.responseText);
        }
    });
})
