<?php
    class Gcontrollers extends Controller
    {
        public function __construct()
        {
            //the model
            $this->GcontrollerModel = $this->model('Gcontroller');
        }
        //hier is de voorpagina van de gameControllers
        public function index()
        {
            $data = 
            [
                'title' => 'Voorpagina'
            ];
            $this->view('gcontrollers/index');
        }
        //hier is de dashboard van de gamecontrollers
        public function dashboard()
        {
            $this->view('gcontrollers/dashboard');
        }
        
        public function GCList()
        {
            //hier is waar we de gegevens uit de database halen, door gebruik van de model.
            $gcontrollers = $this->GcontrollerModel->GController();
            $rows = '';
            foreach($gcontrollers as $value)
            {
                $rows .= "<tr>
                    <td>$value->id</td>
                    <td>$value->name</td>
                    <td>$value->brand</td>
                    <td>$value->price</td>
                    <td>$value->partyType</td>
                    <td><a href='" . URLROOT . "/gcontrollers/update->id'>update</a></td>
                    <td><a href='" . URLROOT . "/gcontrollers/delete/$value->id'>delete</a></td>
              </tr>";
            }
            //Hier worden de gegevens van $row gezet in een array.
            $data = [
                'title' => 'Dashboard',
                'Gcontrollers' => $rows
            ];
            
           
            //stuurt de gegevens van de array $data door naar de view.
            $this->view('gcontrollers/GCList', $data);
        }

        //lijst van de beste controllers
        public function bGCList()
        {

        }

        //Hier ontvangt de controller de gegevens van de view, hij maakt die dan schoon en stuurt hem dan naar de model.
        public function create()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                //voor het testen van de data
                //var_dump($_SERVER["REQUEST_METHOD"]);
                //var_dump($_POST);

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->GcontrollerModel->createGC($_POST);              
                header("Location:" . URLROOT . "/gcontrollers/GCList");
            }
               else
            {
                $data = [
                    'title' => "Voeg een gamecontroller toe"
                ];
                $this->view('gcontrollers/create', $data); 
            }                    
        }

        //het aanpassen van een controller
        public function update()
        {

        }

        //het verwijderen van een controller
        public function delete($id)
        {   
            $this->GcontrollerModel->deleteGC($id);
            $data = [
                'deleteStatus' => 'Gamecontroller is verwijderd'
            ];
            $row = $this->view('/gcontrollers/delete', $data);
            header("Refresh:1; url=" . URLROOT . "/gcontrollers/GCList");
        }
    }
?>
