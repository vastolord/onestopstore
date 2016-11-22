<style>
#imaginary_container{
    margin-top:5%; /* Don't copy this */
    margin-bottom: 15%; /* Don't copy this */
}
.stylish-input-group .input-group-addon{
    background: white !important; 
    border-color: #222;
}
.stylish-input-group .form-control{
    border-right:0; 
    box-shadow:0 0 0; 
    border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
#tbx{
border-color: #222;

}

</style>
{{-- <script src="{{asset('js/sb.js')}}"></script> --}}
<script type="text/javascript">

function validate(){
 var x, text;
    // Get the value of the input field with id="numb"
    x = document.getElementById("tbx").value;
    // If x is Not a Number or less than one or greater than 10
    if (x.length==0) {
        document.getElementById("w").innerHTML = "<strong>Nothing to search!</strong>";
        document.getElementById("w").style.display = "block";
        document.getElementById("schform").addEventListener("click", function(event){
        event.preventDefault()
        });
    } else {
         
        document.getElementById("schform").submit();
    }
    
}

//Validation
    
function show(str) {


    var dataList = document.getElementById('json-datalist');
    var input = document.getElementById('tbx');

    if (str.length == 0) { 
          
        input.placeholder="Search for products..";
        return;
        } else {
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            
            if (this.readyState == 4 && this.status == 200) {
            

            // datalist removeeeeeeelement
            if (dataList.hasChildNodes()) {         
            // It has at least one
                dataList.parentNode.removeChild(option);
                // window.alert('del');
            }
                var found = this.responseText;

                //JSON.parse
                var parsed = JSON.parse(found);
                // var arr = [];
                // for(var x in parsed){

                //     arr.push(parsed[x]);                    
                // }

            var cnt = dataList.childElementCount;

            // Loop over the JSON array.
            parsed.forEach(function(item) {   
            // Create a new <option> element.
            var option = document.createElement('option');
            // Set the value using the item in the JSON array.

            // window.alert('ok');
            option.value = item;
            // Add the <option> element to the <datalist>.
            if (cnt<=6){
            dataList.appendChild(option);
            }
                        // window.alert('append');
            
            });
        




            }


        }
        xmlhttp.open("GET", "/getq?q=" + str, true);
        xmlhttp.send();


    }
}
 


</script>

<div id="w" data-toggle="popover" style="display: none; text-align: center;" data-toggle="popover" class="container alert alert-danger">
</div>
{{-- 
<div class="container">
	<div class="row"> --}}
    <form action="{{route('search')}}" method="get" id="schform">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                
                    <input type="text" name="search" id="tbx" class="form-control" list="json-datalist" placeholder="Search" autocomplete="off" onkeyup="show(this.value)">
                    <datalist id="json-datalist"></datalist>
                      <span class="input-group-addon">
                        <button type="submit" onclick="validate()" id="sbtn">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
            </div>
        </div>
    </form>

{{-- 	</div>
</div> --}}