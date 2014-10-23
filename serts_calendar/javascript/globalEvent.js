function hideGlobalEvents()
  {
  var i;
  for(i=1;i<=1000;i++)
    {
    document.getElementById('globalEvent'+i).style.display='none';
    }
  }
function showGlobalEvents()
  {
  var i;
  for(i=1;i<=1000;i++)
    {
    document.getElementById('globalEvent'+i).style.display='block';
    }
  }
function switchLocation(loc)
  {
  //alert(loc + ' is passed');
  if(loc!=0)
    {
    var wiped = document.getElementsByClassName('global');
    var q = wiped.length;
    while(q--)
      {
      wiped[q].style.display = 'none';
      }
    var show=document.getElementsByClassName('loc_'+loc);
    var i=show.length;
    while(i--)
      {
      show[i].style.display = 'block';
      }  
    }
  else
    {
    var show = document.getElementsByClassName('global');
    var i = show.length;
    while(i--)
      {
      show[i].style.display = 'block';
      }
    }
  }
