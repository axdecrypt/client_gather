var geoPositionSimulator=function(){
	var pub = {};
	var currentPosition=null;
	pub.init = function(array)
	{
		var next=0;
		for (i in array)
		{
				if( i == 0 )
				{
					currentPosition=array[i];
				}
				else
				{
					setTimeout((function(pos) { 
					      return function() { 
					        currentPosition=pos; 									
					      } 
					    })(array[i]),next);
				}
				next+=array[i].duration;							
		}
	}

	pub.getCurrentPosition = function(locationCallback,errorCallback)
	{
		locationCallback(currentPosition);
	}
	return pub;
}();