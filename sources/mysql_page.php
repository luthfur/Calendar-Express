<?php

class Page extends Result
{

  var $pageSize;
  var $page;
  var $row;
  var $result;
  
  
    
  /***************** Set Data Result *******************************/
  function setResult($results, $pageSize)  {
    
    $this->pageSize = $pageSize;
    $this->result = $results;


    if ((int)$page <= 0) $resultpage = 1;
    
    if ($page > $this->getNumPages())
    	$page = $this->getNumPages();
        
  }
  


  /************************ Get Total Number of Pages ***********************/
  function getResultSize()  {
  	  	
    return $this->numRows($this->result);
    
  }


  
  /************************ Get Total Number of Pages ***********************/
  function getNumPages()  {
  	  	
    if (!$this->result) return FALSE;
    return ceil($this->numRows($this->result) / (float)$this->pageSize);
    
  }
  


  
/************************ Set Pages into sets of 10 ***********************/
function setPageSet($p) {
	
	$totalpages = $this->getNumPages();
	
	$sets = ceil($totalpage / 10);
	

}


  
  
  /*********************** Set Page Numbers ********************************/
  function setPageNum($pageNum)  {
  	  	 
    if ($pageNum > $this->getNumPages() || $pageNum <= 0) return FALSE;
  
    $this->page = $pageNum;
    $this->row = 0;

	$internal_row = ($pageNum-1) * $this->pageSize;
	
	$this->setPointer( $internal_row, $this->result );
    
  }






/*********************** Get Data as an Array ***************************/
  function getDataArray() {
	
	$this->row++;

	if($this->row <= $this->pageSize) return $this->getArray($this->result);

  }
  




/*********************** Get Data as a Row ***************************/
  function getDataRow() {
  
	$this->row++;

	if($this->row <= $this->pageSize) return $this->getRow($this->result);

  }
  
  



  /*************************** Get Current Page Number ************************/
  function getPageNum()
  {
  	  
    return $this->page;
    
  }
  
  
  


  /*************************** Check if Last Page ******************************/
  function isLastPage()
  {
  	  
    return ($this->page >= $this->getNumPages());
    
  }
  
  
  
  


  /*************************** Check if First Page ******************************/
  function isFirstPage()
  {
    return ($this->page <= 1);
    
  }
  


/*************************** Check if page exists ******************************/
  function isPage($i) {

	if($this->page == $i) 
		return 1;
	else 
		return 0;

  }
  
    
  
  /*************************** Generate Page Navigation *****************************
  function getPageNav($queryvars = '')
  {
    if (!$this->isFirstPage())
    {
      $nav .= "<a href=\"?resultpage=".
              ($this->getPageNum()-1).'&'.$queryvars.'">Prev</a> ';
    }
    if ($this->getNumPages() > 1)
      for ($i=1; $i<=$this->getNumPages(); $i++)
      {
        if ($i==$this->page)
          $nav .= "$i ";
        else
          $nav .= "<a href=\"?resultpage={$i}&".
                  $queryvars."\">{$i}</a> ";
      }
    if (!$this->isLastPage())
    {
      $nav .= "<a href=\"?resultpage=".
              ($this->getPageNum()+1).'&'.$queryvars.'">Next</a> ';
    }
    
    return $nav;
  }
  
  */
  
}

?>
