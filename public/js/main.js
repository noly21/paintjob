$(document).ready(function(){
    $('select[name=current-color]').on('change', function(){
        if (this.value == "RED") {
            $('#current').attr('src', 'public/images/Red-Car.png')
        }else if(this.value == "BLUE"){
            $('#current').attr('src', 'public/images/Blue-Car.png')
            
        }else if(this.value == "GREEN"){
        $('#current').attr('src', 'public/images/Green-Car.png')
    }
    });

    $('select[name=target-color]').on('change', function(){
        if (this.value == "RED") {
            $('#target').attr('src', 'public/images/Red-Car.png')
        }else if(this.value == "BLUE"){
            $('#target').attr('src', 'public/images/Blue-Car.png')
            
        }else if(this.value == "GREEN"){
        $('#target').attr('src', 'public/images/Green-Car.png')
    }
    });

});