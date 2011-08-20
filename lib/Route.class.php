<?php

class Route
{     

    private static $_instance;

    private $url;
    private $routeList;
    private $matchedRoute;
    private $params;
    private $_protocol;
    private $_host;
    private $_dir;    

    public function __Construct(){ }

    private function __Clone(){}    

    public static function getInstance()
    {
        if (!isset(self::$_instance)) { // Testa se há instância definifa na propriedade, caso sim, a classe não será instanciada novamente.
            self::$_instance = new self; // o new self cria uma instância da própria classe à própria classe.
        }
        return self::$_instance;
    }

    public function init($url,$routeList){
        $this->url = $url;
        $this->routeList = $routeList;
        $this->params = new stdClass;

        $this->_protocol = 'http';
        $this->_host = 'localhost';
        $this->_dir  = '/teste/mysite/';

        $this->urlNormalize();

        return $this;
    }

    protected function urlNormalize(){

        if(preg_match('/'. str_replace('/','\/',$this->_dir) .'([a-z_-]+\.php)?(.*)/',$_SERVER['REQUEST_URI'],$matches)){
            $this->url = $matches[2];
            $this->url = '/'.trim($this->url,'/');
        }else throw new Exception('URL inválida.');

    }

    public function routePatternMake()
    {
        foreach($this->routeList as $rulename=>$rules)
        {
            $rule = $rules['rule'];
            $rule = preg_replace(array('/\//','/\./'),array('\/','\.'),$rule);            
            $count = 0;
            while(preg_match('/\{([\w_]+)\}/',$rule,$matches)){
                $count++;

                if(!isset( $rules['params'][$matches[1]]['pattern'] )){                    
                    $this->routeList[$rulename]['params'][$matches[1]]['pattern'] = '[\w:-]+'; // copia para a real 
                }
                $this->routeList[$rulename]['params_order'][] = $matches[1];
                $rule = preg_replace('/\{'.$matches[1].'\}/','('.$this->routeList[$rulename]['params'][$matches[1]]['pattern'].')',$rule);
                
                if($count > 100) exit;
            }
            $rule = "/^{$rule}$/";
            $this->routeList[$rulename]['pattern'] = $rule;
        }        

        return $this;
    }

    public function routePatternMakeOld()
    {
    
        foreach($this->routeList as $rulename=>$rules)
        {

            $params = explode('/',trim($rules['rule'],'/'));
            $param_vars = array();
            
            $rule_pattern_item = array(); // itens do pattern
            foreach($params as $one_param_value)
            {
            
                if(preg_match('/^([\w._-]+)?\{([\w_]+)\}([\w._-]+)?$/i',$one_param_value,$matches))
                {                    
                    array_push($param_vars,$matches[2]);
                    if(!isset( $rules['params'][$matches[2]]['pattern'] ))
                    {
                        // copia para a real    
                        $this->routeList[$rulename]['params'][$matches[2]]['pattern'] = '[\w:-]+';
                        // copia para a copia do foreach
                        $rules['params'][$matches[2]]['pattern'] = '[\w:-]+';
                    }
                    array_push($rule_pattern_item,$matches[1].'('. $rules['params'][$matches[2]]['pattern']. ')'.$matches[3]);
                } 
                else 
                {
                    array_push($rule_pattern_item,str_replace('.','\.',$one_param_value));
                }
                unset($matches);
            }

            $rule_pattern = '/^\/'.(implode('\/',$rule_pattern_item)).'$/i';

            $this->routeList[$rulename]['pattern'] = $rule_pattern;

        }

        return $this;
    }

    public function check()
    {
        $_params = new stdClass;
        $_route = null;
        $matched = false;
        $url = $this->url;
        $query_string = '';
        if(strpos($this->url,'?')){
            $url = strstr($this->url,'?',true);
            $query_string = strstr($this->url,'?',false);
        }

//         var_export($this->routeList['rule_produto']);
            
        foreach($this->routeList as $rulename=>$rules){
    
            if(preg_match($rules['pattern'],$url,$matches)){      

                $this->matchedRoute = $rules;
                $this->matchedRoute['routename'] = $rulename;
                if(is_array($rules['params']))
                {
                    foreach($rules['params_order'] as $param_order=>$param_name)
                    {
                        $this->params->{$param_name} = $_GET[$param_name] = $matches[$param_order+1];
                    }
                }

                if(!empty($query_string)){
                    $pairs = explode('&',ltrim($query_string,'?'));
                    foreach($pairs as $pair){
                        list($key,$value) = explode('=',$pair);
                        $this->params->{$key} = $_GET[$key] = $value;
                    }
                }
                $matched = true;
                break;
            }
        }

        if(!$matched)throw new Exception('Rota não existente.');

        return $this;
    }

    public function createLink($routeName,$params=array()){
        $ruleCopy = $this->routeList[$routeName]['rule'];        
        if(is_array($this->routeList[$routeName]['params'])){
            foreach($this->routeList[$routeName]['params'] as $one_param_key=>$one_param_value){
                $ruleCopy = preg_replace('/(\{' . $one_param_key . '\})/',$params[$one_param_key],$ruleCopy);
            }
        }
        return $this->_protocol.'://'.$this->_host.$this->_dir.trim($ruleCopy,'/');
    }

    public function getParams(){
        return $this->params;
    }

    public function getParam($paramName){
        if(in_array(array_keys($this->params))) return $this->params[$paramName];
        return null;
    }

    public function getMatchedRouteName(){
        return $this->matchedRoute['routename'];
    }

    public function getMatchedRoute(){
        return $this->matchedRoute;
    }

} 
