$(document).ready(function(){
    let editform= document.getElementById("edit-form");
    var score;
    var fecha;
    console.log(editform);
    $(".edit-score").on("click",function(event){
        const parent=event.target.parentElement;
        score=parent.children[0].innerText;
        console.log(score);
        fecha=new Date(parent.children[1].innerText);
        console.log(fecha);
        $("#editContainer").show();
        document.getElementById("score-edit").value=score;
        document.getElementById("score-fecha").valueAsDate=fecha;

    })

    editform.addEventListener("submit", (e) =>{
        e.preventDefault();
        let newScore=document.getElementById("score-edit").value;
        let newFecha=new Date(document.getElementById("score-fecha").valueAsDate);
        console.log(newScore+newFecha);

        swal({
            title:"Estas seguro?",
            text:"No podras revertir el cambio",
            icon:"warning",
            buttons:{
                cancel:"No",
                confirm:{
                    text:"Si",
                    value:"confirm"
                }

            }   
        }).then((value)=>{
            
            if(value=="confirm"){
                
                $.ajax({
                    url: "http://127.0.0.1/PhotoPlay-Web/servicios.php",
                    type: "POST",
                    data: { function: "changeScore", score:score,newScore:newScore,fecha:fecha,newFecha:newFecha},
                    success: function(data){
                        console.log(data);
                        
                    }
                });
            }
        });
    })
})
