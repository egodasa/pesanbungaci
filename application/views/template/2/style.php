<style>
/* Remove the navbar's default margin-bottom and rounded borders */ 
.navbar {
    margin-bottom: 0;
    border-radius: 0;
}
.navbar-inverse {
    background-color: #444444; /* BACKGROUND NAVBAR */
    border-color: #444444;
}
.navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
	border-color: #444444;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover {
    color: #fff;
    background-color: #444444; /* BACKGROUND menu aktif */
}
.navbar-inverse .navbar-nav>li>a {
    color: #FFF; /* warna menu non-aktif */
}
.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {
    background-color: #fff;
}
.navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {
    background-color: #fff;
}
.navbar-inverse .navbar-toggle {
    border-color: #fff;
}
.navbar-toggle {
    position: relative;
    float: right;
    padding: 9px 10px;
    margin-top: 8px;
    margin-right: 15px;
    margin-bottom: 8px;
    color : #fff; 
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: auto}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 5px;
      padding-right: 5px;
      padding-bottom: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }/
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
.panel-default>.panel-heading {
    color: #333;
    background-color: #C8009B;
    border-color: #ddd;
}
.navbar-brand {
    float: left;
    height: 50px;
    padding: 0;
    font-size: 18px;
    line-height: 20px;
}
.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
    background-color: #444444;
    border-color: #ddd;
    border-radius: 0;
}
.thumbnail
{
    margin-bottom: 20px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
}
.item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover
{
    background: #428bca;
}

.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
}
.item.list-group-item .caption
{
    padding: 9px 9px 0px 9px;
}
.item.list-group-item:nth-of-type(odd)
{
    background: #eeeeee;
}

.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item img
{
    float: left;
}
.item.list-group-item:after
{
    clear: both;
}
.list-group-item-text
{
    margin: 0 0 11px;
}
.btn
{
    border-radius: 3px;	
}
    </style>
</head>
