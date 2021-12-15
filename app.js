$(document).ready(function () {
    $.ajax({
        url:"http://localhost/novine2/data.php",
        method:"GET",
        success: function (data) {
            console.log(data);
            var odgovo=[];
            var bro=[];
            for(var i in data) {
                odgovo.push(data[i].odgovor);
                bro.push(data[i].broj);
            }
            var chartdata={
                labels: odgovo,
                datasets:[{
                    label: 'Odgovori',
                    backgroundColor: [
                        "red",
                        "blue",
                        "orange",
                        "green",
                        "yellow",
                        "purple"
                    ],
                    borderColor: [
                        "red",
                        "blue",
                        "orange",
                        "green",
                        "yellow",
                        "purple"
                    ],


                    data:bro
                }]
            };
            var ctx=$("#myChart");
            var myChart= new Chart(ctx,{
                type:'pie',
                data: chartdata
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
});