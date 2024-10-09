const taskList = document.getElementById('list-tasks');
const inputText = document.getElementById('input-text');



taskList.addEventListener('click',function(e){
    if(e.target.tagName == 'li'){
        e.target.classList.toggle("checked");
    }
});







/*function addTask(){
    if(inputText.value == ""){
        alert("Nemôže to byť prázdne!");
    }
    else{
        let li = document.createElement("li");
        li.innerHTML = inputText.value;
        taskList.appendChild(li);
        let span = document.createElement("span");
        span.innerHTML = "&#10005";
        li.appendChild(span);
       
    }
    inputText.value = "";
}

taskList.addEventListener('click',function(e){
    if(e.target.tagName == "LI"){
        e.target.classList.toggle("checked");
    }
    else if(e.target.tagName == "SPAN"){
        e.target.parentElement.remove();
    }
},false);*/