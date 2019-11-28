window.onload = function(){
var search = document.getElementById('lookup');

search.addEventListener('click',function(e){
    e.preventDefault();
    var country = document.getElementById('country').value;
    var xhr = new XMLHttpRequest();

    xhr.open('GET','world.php?q='+country,true);
    xhr.onload = function(){
        if(this.status == 200){
            var info = JSON.parse(this.response);
            console.log(info);
            document.getElementById('result').innerHTML = "<p>"+info.name+"</p>";
            // console.log(this.response)
        }
    }
    xhr.send();
})
}