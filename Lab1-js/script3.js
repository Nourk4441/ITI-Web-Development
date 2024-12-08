cond=false
while(cond=false){   
name1=prompt('Enter your name')
if(typeof name1==="string"){cond=true}
birth=prompt('Enter birth year')
if(typeof birth==="number"& birth<2010){cond=true}
age=2010-birth
    document.write('Name: '+name1)
    document.write('Birth year: '+birth)
    document.write('Age: '+age)
}