<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>jQuery tablesorter 2.0 - Print Widget</title>

	<!-- jQuery -->
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/jquery-latest.js"></script>

	<!-- Demo stuff -->
	<link class="ui-theme" rel="stylesheet" href="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/jquery-ui.css">
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/jquery-ui.js"></script>
	<link rel="stylesheet" href="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/jq.css">
	<link href="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/prettify.css" rel="stylesheet">
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/prettify.js"></script>
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/docs.js"></script>

	<!-- Tablesorter: required -->
	<link rel="stylesheet" href="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/theme.css">
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/jquery.js"></script>
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/jquery_002.js"></script>

	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/widget-columnSelector.js"></script>
	<script src="jQuery%20tablesorter%202.0%20-%20Print%20Widget_files/widget-print.js"></script>

	<style>
	.options th.narrow {
		width: 150px;
	}
	.button {
		position: relative;
		padding: 1px 6px;
		display: inline-block;
		cursor: pointer;
		border: #000 1px solid;
		border-radius: 5px;
	}
	.columnSelector, .hidden {
		display: none;
	}
	#colSelect1:checked + label {
		color: #307ac5;
	}
	#colSelect1:checked ~ #columnSelector {
		display: block;
	}
	.columnSelector {
		width: 120px;
		position: absolute;
		top: 30px;
		padding: 10px;
		background: #fff;
		border: #99bfe6 1px solid;
		border-radius: 5px;
	}
	.columnSelector label {
		display: block;
		text-align: left;
	}
	.columnSelector label:nth-child(1) {
		border-bottom: #99bfe6 solid 1px;
		margin-bottom: 5px;
	}
	.columnSelector input {
		margin-right: 5px;
	}
	.columnSelector .disabled {
		color: #ddd;
	}
	</style>

	<script id="js">$(function() {

	// v2.24.6, change popup print & close button text
	// See print_now description
	$.tablesorter.language.button_print = "Print";
	$.tablesorter.language.button_close = "Close";

	$(".tablesorter").tablesorter({
		theme: 'blue',
		widgets: ["zebra", "filter", "print", "columnSelector"],
		widgetOptions : {
			columnSelector_container : $('#columnSelector'),
			columnSelector_name : 'data-name',

			print_title      : '',          // this option > caption > table id > "table"
			print_dataAttrib : 'data-name', // header attrib containing modified header name
			print_rows       : 'f',         // (a)ll, (v)isible, (f)iltered, or custom css selector
			print_columns    : 's',         // (a)ll, (v)isible or (s)elected (columnSelector widget)
			print_extraCSS   : '',          // add any extra css definitions for the popup window here
			print_styleSheet : '../css/theme.blue.css', // add the url of your print stylesheet
			print_now        : true,        // Open the print dialog immediately if true
			// callback executed when processing completes - default setting is null
			print_callback   : function(config, $table, printStyle) {
				// do something to the $table (jQuery object of table wrapped in a div)
				// or add to the printStyle string, then...
				// print the table using the following code
				$.tablesorter.printTable.printOutput( config, $table.html(), printStyle );
			}
		}
	});

	$('.print').click(function() {
		$('.tablesorter').trigger('printTable');
	});

});</script>

<style>body.tablesorter-disableSelection { -ms-user-select: none; -moz-user-select: -moz-none;-khtml-user-select: none; -webkit-user-select: none; user-select: none; }.tablesorter-resizable-container { position: relative; height: 1px; }.tablesorter-resizable-handle { position: absolute; display: inline-block; width: 8px;top: 1px; cursor: ew-resize; z-index: 3; user-select: none; -moz-user-select: none; }</style><style>.tablesorter511f9d597e577columnselector col:nth-child(1),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(1),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="0"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="0"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(1),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(1),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="0"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="0"],.tablesorter511f9d597e577columnselector col:nth-child(3),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(3),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="2"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="2"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(3),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(3),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="2"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="2"],.tablesorter511f9d597e577columnselector col:nth-child(6),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(6),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="5"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="5"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(6),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(6),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="5"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="5"],.tablesorter511f9d597e577columnselector col:nth-child(7),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(7),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="6"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="6"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(7),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(7),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="6"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="6"] { display: none; }</style><style>@media only all { .tablesorter511f9d597e577columnselector col:nth-child(1),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(1),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="0"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="0"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(1),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(1),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="0"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="0"],.tablesorter511f9d597e577columnselector col:nth-child(4),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(4),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="3"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="3"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(4),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(4),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="3"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="3"],.tablesorter511f9d597e577columnselector col:nth-child(3),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(3),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="2"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="2"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(3),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(3),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="2"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="2"] { display: none; } } @media all and (min-width: 30em) { .tablesorter511f9d597e577columnselector col:nth-child(1),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(1),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="0"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="0"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(1),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(1),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="0"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="0"] { display: table-cell; } } @media all and (min-width: 40em) { .tablesorter511f9d597e577columnselector col:nth-child(4),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(4),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="3"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="3"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(4),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(4),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="3"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="3"] { display: table-cell; } } @media all and (min-width: 50em) { .tablesorter511f9d597e577columnselector col:nth-child(3),.tablesorter511f9d597e577columnselector_extra_table col:nth-child(3),.tablesorter511f9d597e577columnselector tr:not(.hasSpan) th[data-column="2"],.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) th[data-column="2"],.tablesorter511f9d597e577columnselector tr:not(.hasSpan) td:nth-child(3),.tablesorter511f9d597e577columnselector_extra_table tr:not(.hasSpan) td:nth-child(3),.tablesorter511f9d597e577columnselector tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="2"],.tablesorter511f9d597e577columnselector_extra_table tr td:not(.tablesorter511f9d597e577columnselectorhasSpan)[data-column="2"] { display: table-cell; } } </style></head>



<body>

<div id="main">



	<h1>Demo</h1>
	<div id="demo"><div class="print button">Print</div>

<div class="columnSelectorWrapper button">
	<input id="colSelect1" type="checkbox" class="hidden">
	<label class="columnSelectorButton" for="colSelect1">Column</label>
	<div id="columnSelector" class="columnSelector"><label><input type="checkbox" data-column="auto" class="checked">Auto: </label>
		<!-- this div is where the column selector is added -->
	<label class=""><input type="checkbox" data-column="0" class="">First</label><label class=""><input type="checkbox" data-column="2" class="">City</label><label class=""><input type="checkbox" data-column="3" class="checked" checked="checked">Age</label><label class=""><input type="checkbox" data-column="4" class="checked" checked="checked">Total</label><label class=""><input type="checkbox" data-column="5" class="">Discount</label><label class=""><input type="checkbox" data-column="6" class="">Date</label></div>
</div>
<table class="tablesorter tablesorter-blue tablesorter511f9d597e577 tablesorter511f9d597e577columnselector hasFilters" role="grid">
	<thead>
		<tr role="row" class="tablesorter-headerRow">
			<th class="filter-select tablesorter-header tablesorter-headerUnSorted filtered" data-placeholder="Select a name" data-priority="2" data-name="First" data-column="0" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="First Name: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">First Name</div></th>
			<th data-placeholder="Exact matches only" data-priority="critical" data-column="1" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="Last Name: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">Last Name</div></th>
			<th data-placeholder="Choose a city" data-priority="4" data-column="2" class="tablesorter-header tablesorter-headerUnSorted filtered" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="City: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">City</div></th>
			<th data-placeholder="Enter an age" data-priority="3" data-column="3" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="Age: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">Age</div></th>
			<th data-placeholder="Select a filter" data-column="4" class="tablesorter-header tablesorter-headerUnSorted" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="Total: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">Total</div></th>
			<th class="filter-select tablesorter-header tablesorter-headerUnSorted filtered" data-column="5" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="Discount: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">Discount</div></th>
			<th data-column="6" class="tablesorter-header tablesorter-headerUnSorted filtered" tabindex="0" scope="col" role="columnheader" aria-disabled="false" unselectable="on" style="user-select: none;" aria-sort="none" aria-label="Date: No sort applied, activate to apply an ascending sort"><div class="tablesorter-header-inner">Date</div></th>
		</tr>
	<tr role="search" class="tablesorter-filter-row tablesorter-ignoreRow"><td data-column="0" class="filtered"><select class="tablesorter-filter" data-column="0" aria-label="Filter &quot;First Name&quot; column by..." data-lastsearchtime="1665617652933"><option value="" selected="selected">Select a name</option><option parsed="aaron" data-function-name="Aaron" value="Aaron">Aaron</option><option parsed="bruce" data-function-name="Bruce" value="Bruce">Bruce</option><option parsed="clark" data-function-name="Clark" value="Clark">Clark</option><option parsed="denni" data-function-name="Denni" value="Denni">Denni</option><option parsed="dennis" data-function-name="Dennis" value="Dennis">Dennis</option><option parsed="john" data-function-name="John" value="John">John</option><option parsed="peter" data-function-name="Peter" value="Peter">Peter</option></select></td><td data-column="1"><input type="search" placeholder="Exact matches only" class="tablesorter-filter" data-column="1" aria-label="Filter &quot;Last Name&quot; column by..." data-lastsearchtime="1665617652933"></td><td data-column="2" class="filtered"><input type="search" placeholder="Choose a city" class="tablesorter-filter" data-column="2" aria-label="Filter &quot;City&quot; column by..." data-lastsearchtime="1665617652933"></td><td data-column="3"><input type="search" placeholder="Enter an age" class="tablesorter-filter" data-column="3" aria-label="Filter &quot;Age&quot; column by..." data-lastsearchtime="1665617652933"></td><td data-column="4"><input type="search" placeholder="Select a filter" class="tablesorter-filter" data-column="4" aria-label="Filter &quot;Total&quot; column by..." data-lastsearchtime="1665617652933"></td><td data-column="5" class="filtered"><select class="tablesorter-filter" data-column="5" aria-label="Filter &quot;Discount&quot; column by..." data-lastsearchtime="1665617652933"><option value="" selected="selected"></option><option parsed="4" data-function-name="4%" value="4%">4%</option><option parsed="5" data-function-name="5%" value="5%">5%</option><option parsed="11" data-function-name="11%" value="11%">11%</option><option parsed="14" data-function-name="14%" value="14%">14%</option><option parsed="15" data-function-name="15%" value="15%">15%</option><option parsed="17" data-function-name="17%" value="17%">17%</option><option parsed="18" data-function-name="18%" value="18%">18%</option><option parsed="20" data-function-name="20%" value="20%">20%</option><option parsed="22" data-function-name="22%" value="22%">22%</option><option parsed="25" data-function-name="25%" value="25%">25%</option><option parsed="32" data-function-name="32%" value="32%">32%</option><option parsed="44" data-function-name="44%" value="44%">44%</option></select></td><td data-column="6" class="filtered"><input type="search" placeholder="" class="tablesorter-filter" data-column="6" aria-label="Filter &quot;Date&quot; column by..." data-lastsearchtime="1665617652933"></td></tr></thead>
	<tbody aria-live="polite" aria-relevant="all">
		<tr role="row" class="odd"><td>Aaron</td><td>Johnson Sr</td><td>Atlanta</td><td>35</td><td>$5.95</td><td>22%</td><td>Jun 26, 2004 7:22 AM</td></tr>
		<tr role="row" class="even"><td>Aaron</td><td>Johnson</td><td>Yuma</td><td>12</td><td>$2.99</td><td>5%</td><td>Aug 21, 2009 12:21 PM</td></tr>
		<tr role="row" class="odd"><td>Clark</td><td>Henry Jr</td><td>Tampa</td><td>51</td><td>$42.29</td><td>18%</td><td>Oct 13, 2000 1:15 PM</td></tr>
		<tr role="row" class="even"><td>Denni</td><td>Henry</td><td>New York</td><td>28</td><td>$9.99</td><td>20%</td><td>Jul 6, 2006 8:14 AM</td></tr>
		<tr role="row" class="odd"><td>John</td><td>Hood</td><td>Boston</td><td>33</td><td>$19.99</td><td>25%</td><td>Dec 10, 2002 5:14 AM</td></tr>
		<tr role="row" class="even"><td>Clark</td><td>Kent Sr</td><td>Los Angeles</td><td>18</td><td>$15.89</td><td>44%</td><td>Jan 12, 2003 11:14 AM</td></tr>
		<tr role="row" class="odd"><td>Peter</td><td>Kent Esq</td><td>Seattle</td><td>45</td><td>$153.19</td><td>44%</td><td>Jan 18, 2021 9:12 AM</td></tr>
		<tr role="row" class="even"><td>Peter</td><td>Johns</td><td>Milwaukee</td><td>13</td><td>$5.29</td><td>4%</td><td>Jan 8, 2012 5:11 PM</td></tr>
		<tr role="row" class="odd"><td>Aaron</td><td>Evan</td><td>Chicago</td><td>24</td><td>$14.19</td><td>14%</td><td>Jan 14, 2004 11:23 AM</td></tr>
		<tr role="row" class="even"><td>Bruce</td><td>Evans</td><td>Upland</td><td>22</td><td>$13.19</td><td>11%</td><td>Jan 18, 2007 9:12 AM</td></tr>
		<tr role="row" class="odd"><td>Clark</td><td>McMasters</td><td>Pheonix</td><td>18</td><td>$55.20</td><td>15%</td><td>Feb 12, 2010 7:23 PM</td></tr>
		<tr role="row" class="even"><td>Dennis</td><td>Masters</td><td>Indianapolis</td><td>65</td><td>$123.00</td><td>32%</td><td>Jan 20, 2001 1:12 PM</td></tr>
		<tr role="row" class="odd"><td>John</td><td>Hood</td><td>Fort Worth</td><td>25</td><td>$22.09</td><td>17%</td><td>Jun 11, 2011 10:55 AM</td></tr>
	</tbody>
</table></div>
