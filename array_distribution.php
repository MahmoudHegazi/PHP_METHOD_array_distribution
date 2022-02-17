<?php 

$cars=array(
  "Volvo","BMW","Toyota","Honda","Mercedes","Opel","osa",
  "Volvo","BMW","Toyota","Honda","Mercedes","Opel","osa",
  "Volvo","BMW","Toyota","Honda","Mercedes","Opel","osa",
  "Volvo","BMW","Toyota","Honda","Mercedes","Opel","osa",
  "osa"
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
print_r(array_distribution($cars, 7, 5));
echo "</pre>";
?>
