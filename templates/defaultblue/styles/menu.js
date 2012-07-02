/**
 * @PROJECT:   mygosuMenu 1.0.3
 * @COPYRIGHT: (c) 2003,2004 Cezary Tomczak
 * @LINK:      http://gosu.pl/software/mygosumenu.html
 * @LICENSE:   BSD
 */

var menuTimeout = 400

var menuSections = new Array()
var menuCountHide = new Array()

var menuSectionCnt = 0
var menuBoxCnt = 0




/*************** Display Pull Down Menu *****************************/
function displayMenu(section, elements) {

  for (var i = 0; i < menuSections.length; i++) {
    if (menuSections[i] != section) {
      menuHide(menuSections[i], menuCountNodes(menuSections[i]))
    }
  }
  for (var i = 1; i <= elements; i++) {
    document.getElementById(section + '-' + i).style.visibility = 'visible'
  }
}





function menuHide(section, elements) {
  
  for (var i = 1; i <= elements; i++) {

    document.getElementById(section + '-' + i).style.visibility = 'hidden'
    document.getElementById(section).style.zIndex = -1

  }

}




function menuTryHide(section, elements, countHide) {

  if (countHide != menuCountHide[section]) {
    return
  }

  menuHide(section, elements)

}






function menuCountNodes(element) {
 
  ret = 0
  nodes = document.getElementById(element).childNodes.length
  
  for (var i = 0; i < nodes; i++) {
    if (document.getElementById(element).childNodes[i].nodeType == 1) {
      ret++
    }
  }

  return ret
}




function menuInitSection(section) {

  var elements = menuCountNodes(section)


  for (var i = 0; i <= elements; i++) {

    var s = (i == 0 ? (section + '-top') : (section + '-' + i))


    if (i == 0) {

      document.getElementById(s).onmouseover = function() {

        displayMenu(section, elements)
        menuCountHide[section]++
        
		for (var ii = 0; ii < menuSections.length; ii++) {
          
		  document.getElementById(section).style.zIndex = 1
          
		  if (menuSections[ii] != section) {
            document.getElementById(menuSections[ii]).style.zIndex = -1
          }

        }
      }

    } else {

      document.getElementById(s).onmouseover = function() {
        displayMenu(section, elements)
        menuCountHide[section]++

      }

    }

    document.getElementById(s).onmouseout = function() {
      setTimeout("menuTryHide('" + section + "', " + elements + ", " + menuCountHide[section] + ")", menuTimeout)
   
	}

  }

}




function menuMakeId(nodes) {

  for (var i = 0; i < nodes.length; i++) {

    switch (nodes[i].className) {

      case 'top':
        menuSectionCnt++
        menuBoxCnt = 0
        nodes[i].id = 'menu-' + menuSectionCnt + '-top'
        break

      case 'section':
        nodes[i].id = 'menu-' + menuSectionCnt
        menuSections[menuSections.length] = nodes[i].id
        break

      case 'box':
        menuBoxCnt++
        nodes[i].id = 'menu-' + menuSectionCnt + '-' + menuBoxCnt
        break

    }

    if (nodes[i].childNodes) {
      menuMakeId(nodes[i].childNodes)
    }

  }


}



function menuInit() {

  menuMakeId(document.getElementById('nav').childNodes)

  for (var i = 0; i < menuSections.length; i++) {
    menuCountHide[menuSections[i]] = 0
  }

  for (var i = 0; i < menuSections.length; i++) {
    menuInitSection(menuSections[i])
  }

}