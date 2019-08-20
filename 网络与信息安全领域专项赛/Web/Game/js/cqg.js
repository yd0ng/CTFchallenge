$(document).ready(function(){
    var machineC = $("#machineC").slotMachine({
        active	: 0,
        delay	: 500
    });
    
    var machineQ = $("#machineQ").slotMachine({
        active	: 1,
        delay	: 500
    });
    
    window.machineG = $("#machineG").slotMachine({
        active	: 2,
        delay	: 500
    });
    
    var started = 0;
    var score = 0;
    
    $("#slotMachineButtonShuffle").click(function(){
        started = 3;
        score = 0;
        machineC.shuffle();
        machineQ.shuffle();
        machineG.shuffle();
    });
    
    $("#slotMachineButtonStop").click(function(){
        switch(started){
            case 3:
                machineC.stop();
                score += machineC.active;
                break;
            case 2:
                machineQ.stop();
                score += machineQ.active;
                break;
            case 1:
                machineG.stop();
                score += machineG.active;
                break;
        }
        started--;
        //console.log(score);
        if(score == 15){
            $.ajax({
                url: 'score.php',
                type: 'POST',
                data: 'score='+score,
                success: function(data){
                    var data = data;
                    $("#output").text(data);
                }
            })         
        }
    });
});