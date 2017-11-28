# MultipleCeckboxes on the same property
There is a solution to map multiple checkboxes on a property using <f:form.checkbox />

### Controller implementation
``` php
public function initializeAction() 
{   
    $requestService = new RequestService();
    
    $validArguments = $requestService->resolveEmptyIdentityFields(
                        $this->request->getArgument('field'));
    
}
```