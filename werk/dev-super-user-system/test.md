@startuml
left to right direction
skinparam packageStyle rectangle
actor Super_user
actor Student
actor Warehouse_admin
actor Financial_admin
rectangle reqeust_products {
Student -- (request products)
(request products) .> (accept request)
(request products) .> (check stock)
(producten afwijzen) .> (request products)
(request products) -- Warehouse_admin
(request products) -- Super_user
}
@enduml