// -----------------------------------------------------------------------
// Code to run when site loads
// -----------------------------------------------------------------------




// -----------------------------------------------------------------------
// Frontend Controls
// -----------------------------------------------------------------------


// -----------------------------------------------------------------------
// Backed update
// -----------------------------------------------------------------------

// Execute the Change Example
function execute() {

    // GET Values
    // ----------------------------
    var col1value = 1
    var col2value = 1
    var col3value = 1

    //DO Any required frontend updates
    // ----------------------------
    //UPDATE THE VALUES BY CALLING THE AJAX API
    $.ajax("http://localhost/testhack/update.php?id=1&col1="+ col1value + "&col2=" + col2value +"&col3=" + col3value);
};

