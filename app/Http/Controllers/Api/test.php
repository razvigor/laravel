// kreiranje i ažuriranje elementa
    public function store(Request $request)
    {
        // nađi element
        $element=$request->isMethod('put') ? Element::findOrFail($request->id) : new Element;

        //if($request->input('proizvod_id')*($request->input('mattip_id')+$request->input('sklop'))*($request->input('materijal_id')+$request->input('sklop'))){
        if($request->input('proizvod_id')!==0 && $request->input('mattip_id')!==0){
            
            $element->id             = $request->input('id');
            $element->proizvod_id    = $request->input('proizvod_id');
            $element->naziv          = $request->input('naziv');
            $element->mattip_id      = $request->input('mattip_id');
            $element->materijal_id   = $request->input('materijal_id');
  
            $element->sklop          = $request->input('sklop');
   
            $element->id_nadredjenog = $request->input('id_nadredjenog');
            $element->elint_01       = $request->input('el_int_01');
            $element->elint_02       = $request->input('el_int_02');
            $element->elint_03       = $request->input('el_int_03');
            $element->elint_04       = $request->input('el_int_04');
            $element->elint_05       = $request->input('el_int_05');
            $element->elint_06       = $request->input('el_int_06');
            $element->elint_07       = $request->input('el_int_07');
    
            $element->elvar_21       = $request->input('el_var_21');
            $element->elvar_22       = $request->input('el_var_22');
            $element->elvar_23       = $request->input('el_var_23');
    
            $element->eltxt_31       = $request->input('el_txt_31');
    
    
    
    
            if($element->save()){
                return new ElementRES($element);
            }
           

        }

    }