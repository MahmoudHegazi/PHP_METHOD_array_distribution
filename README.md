# PHP_METHOD_array_distribution
The inline method is similar to the non-clustered parse method in Python but for
php it can be used to distribute or create entire lists with a specified list length,
and also with the default value that can be set using another function or the reason
it was created to get it. values ​​from a given array,

if data is ```(1, 2, 3, 4)``` the result will be ```array((1, 2), (3, 4))```,
data is ```(1, 2, 3)``` the result will be ( (1,2), ( 1, the_value_default)),
data ```array(1,2) the result will be ```(1,2), (default, default)```,

the data array is empty () the result will be ```((default, default), (default, default))```

can be used In many situations


###  example 1

normal use it with strings and default string or false
(Useful for calendars as it shows month by weeks
from a list of specific days without needing a schedule an array of month days will
gives you the data needed for 5 weeks 28 29 30 31 always have valid weeks it can make u switch
from day to month easiely or vice versa or even handle the full year calendar


```
<?php
$days=array(
  "1","2","3","4","5","6","7",
  "8","9","10","11","12","13","14",
  "15","16","17","18","19","20","21",
  "22","23","24","25","26","27","28",
  "29"
);

function array_distribution($data_array, $max_per_array, $max_array, $default='python king'){
  $result = array();
  $project_data = $data_array;
  // loop over num of arrays needed
  for ($arr=0; $arr<$max_array; $arr++){
    // create new array which can accept the max elements or add specafied value in case no again
    $new_child = array();
    for($elm=0; $elm<$max_per_array; $elm++){
      if (count($project_data) > 0){
        array_push($new_child, $project_data[0]);
        array_shift($project_data);
      } else {
        array_push($new_child, $default);
        array_shift($project_data);
      }
      // now remove the added elem note in case it removed all np it will add the default else no more loops
     
    }
    array_push($result, $new_child);
  }
  return $result;
}

echo "<pre>";
print_r(array_distribution($days, 7, 5));
echo "</pre>";
?>
```


## example 2 
This can handle nested arrays and accept the default value as an array or even an array of arrays, so if you study it you can make good things with it

```php
<?php
$cars=array(
  array("data1", "data2"), array("data1", "data2"), array("data1", "data2")
);

function array_distribution($data_array, $max_per_array, $max_array, $default=array()){
  $result = array();
  $project_data = $data_array;
  // loop over num of arrays needed
  for ($arr=0; $arr<$max_array; $arr++){
    // create new array which can accept the max elements or add specafied value in case no again
    $new_child = array();
    for($elm=0; $elm<$max_per_array; $elm++){
      if (count($project_data) > 0){
        array_push($new_child, $project_data[0]);
        array_shift($project_data);
      } else {
        array_push($new_child, $default);
        array_shift($project_data);
      }
      // now remove the added elem note in case it removed all np it will add the default else no more loops
     
    }
    array_push($result, $new_child);
  }
  return $result;
}

echo "<pre>";
print_r(array_distribution($cars, 2, 2));
echo "</pre>";
?>

```
