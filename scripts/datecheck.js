       function comparedates()
                {
                        if (document.getElementById('date1').value > document.getElementById('date2').value)
                        {
                                alert ('Finishing date shall be later than starting date!');
								return false;
                        }
						
						else
						{
								return true;
						}
                }