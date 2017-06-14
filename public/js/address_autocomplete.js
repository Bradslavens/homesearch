function getInfo(){
    
    var authID = "f37feb66-957b-e90f-4d99-d1a96ff5b0b0";
    var authToken = "0Yzia3WHEC7tNcepsBia";
    var suggestions = "5";
    var prefix = "3399+Ruffin";
    var cityFilter = "San Diego";
                    
    var url = "https://us-autocomplete.api.smartystreets.com/suggest?";
        url += "auth-id=" + authID;
        url += "&auth-token=" + authToken;
        url += "&prefix=" + prefix;
        url += "&suggestions=" + suggestions;
        url += "&city_filter=" + cityFilter;
    
    
    
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.status);
            console.log(this.responseText)
        }    
    }
    xhr.open("GET", encodeURI(url),true);
    xhr.setRequestHeader("content-type", "application/json");
    xhr.send();
}