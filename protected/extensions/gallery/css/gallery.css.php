<?php echo '#'.$this->id; ?> ul.egallery {
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    margin: 0 auto;
    padding: 0;
    justify-content:flex-start;
    align-items: stretch;
    align-content: stretch;
}

<?php echo '#'.$this->id;?> ul.egallery li a {
    display: block;
    margin:5px;
    width: 140px;
    height: 90px;
}

<?php echo '#'.$this->id;?> ul.egallery li
{
    width: 150px;
}

<?php echo '#'.$this->id;?> ul.egallery img
{
	color: inherit;
	vertical-align: top;
	display: block;
	margin: auto;
    width:100%;
}

<?php echo '#'.$this->id;?> .newRow {clear:left}