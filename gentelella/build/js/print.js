function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=auto,width=100%');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + ''  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}

function printDiv(elem) {
    var divToPrint = document.getElementById(elem);
    var htmlToPrint = '' +
        '<style type="text/css">' +
        '' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open('', 'PRINT', 'height=auto,width=80mm');
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}