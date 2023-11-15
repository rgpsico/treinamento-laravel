<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
 
</head>
<body>

<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container mt-5">
    @include('teste.teste')
</div>

<button class="btn btn-success" id="save-pdf">Assinar PNG</button>
<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


<script>
    $(document).ready(function(){

   
        $(document).on('click', '#save-pdf', function() {
    html2canvas(document.querySelector(".contrato"), { scale: 1.8 }).then(canvas => {
        var imgData = canvas.toDataURL('image/jpeg', 1.0);
        window.jsPDF = window.jspdf.jsPDF
        var pdf = new jsPDF('p', 'mm', 'a4');

        var pageWidth = pdf.internal.pageSize.getWidth();
        var pageHeight = pdf.internal.pageSize.getHeight();

        // Definindo as margens
        var margin = 4; // margem em milímetros
        var imgWidth = pageWidth - 2 * margin;
        var imgHeight = canvas.height * imgWidth / canvas.width;

        var heightLeft = imgHeight;
        var position = 0;

        // Adiciona a imagem na primeira página
        pdf.addImage(imgData, 'JPEG', margin, position + margin, imgWidth, imgHeight);
        heightLeft -= pageHeight;

        // Enquanto houver conteúdo, crie novas páginas e adicione a imagem
        while (heightLeft >= 0) {
            position -= pageHeight;
            pdf.addPage();
            pdf.addImage(imgData, 'JPEG', margin, position + margin, imgWidth, imgHeight);
            heightLeft -= pageHeight;
        }

        pdf.save('contrato.pdf');
    });
});





function dataURLToBlob(dataurl) {
    var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
    while(n--){
        u8arr[n] = bstr.charCodeAt(n);
    }
    return new Blob([u8arr], {type:mime});
}
})
</script>

</body>
</html>
