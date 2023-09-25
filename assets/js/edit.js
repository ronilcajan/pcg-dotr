
if (window.location.href.indexOf("edit_marep") > -2 || 
window.location.href.indexOf("edit_urban_marsar") > -2 || 
window.location.href.indexOf("edit_marslec") > -2 || 
window.location.href.indexOf("edit_marsar") > -2 || 
window.location.href.indexOf("edit_marsaf") > -2) {
    selectSubStation()
    selectReportSelection()
    selectMaritimeIncident()
    selectReportType()
}

function selectReportSelection(){
    var id = $('#or_report').val(); 
    $('input[name="report_selection"]').val(id)
    $('.toggle-show').css({"display": "none" }); 
    $('.toggle-show[data-id="'+id+'"]').css({"display": "block" }); 
}
function selectMaritimeIncident(){ 
    var maritime_incident = $('#or_maritime_incident_type').val(); 
    $('input[name="maritime_incident"]').val(maritime_incident)
    $('.toggle-show').css({"display": "none" });
    $('.toggle-show[data-id="'+maritime_incident+'"]').css({"display": "block" }); 
    // clear input whenever a marine incident alters
    $('input[type=checkbox].step-2').prop("checked", false);
    $("select.step-2 option:selected").prop("selected", false);
    $("input[type=text].step-2").val('')
}
function selectReportType(){
    
    var report_type = $('#or_report_type').val();
    if(report_type){
        $('input[name="report_selection"]').val(report_type)
        $('.toggle-show').css({"display": "none" });
        $('.toggle-show[data-id="'+report_type+'"]').css({"display": "block" }); 
    }
    
}

// edit selection
function selectSubStation(){
    var text = $('#station').find(':selected').text() 
    var org_station_id = $('#or_substation').val() 
    var station_id = $('#station').val() 
    $('input[name="station"]').val(station_id)
    var text = text.replace('CGS ', "");  
    $('#station-text').text(text)
    if(station_id != ""){
        $.ajax({
            url: BASE_URL + 'substation/get_substation_by_station/' + station_id,
            type: 'POST',  
            dataType: 'JSON',
            success: function(data){  
                $('#toggle-hidden').removeClass('hidden')
                $("#sub-station").empty();
                $("#sub-station").append(new Option("Select", "" ))
                $.each(data , function(index, val) {
                    console.log(val.sub_station_id === org_station_id)
                    if(val.sub_station_id === org_station_id){
                        $("#sub-station").append(new Option(val.sub_station, val.sub_station_id, true, true));
                    }else{
                        $("#sub-station").append(new Option(val.sub_station, val.sub_station_id));
                    }
                    
                });
            },
            error: function(xhr, textStatus, error){
                console.info(xhr.responseText);
            }
        });
    }else{
        $('#toggle-hidden').addClass('hidden')
        $("#sub-station").empty();

    }

}