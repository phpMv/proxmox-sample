<?php
return array("#tableName"=>"serveur","#primaryKeys"=>["id"=>"id"],"#manyToOne"=>[],"#fieldNames"=>["id"=>"id","ipAddress"=>"ipAddress","dnsName"=>"dnsName","login"=>"login","password"=>"password","dnss"=>"dnss","routes"=>"routes","vms"=>"vms","users"=>"users"],"#memberNames"=>["id"=>"id","ipAddress"=>"ipAddress","dnsName"=>"dnsName","login"=>"login","password"=>"password","dnss"=>"dnss","routes"=>"routes","vms"=>"vms","users"=>"users"],"#fieldTypes"=>["id"=>"int(11)","ipAddress"=>"varchar(15)","dnsName"=>"varchar(255)","login"=>"varchar(50)","password"=>"varchar(255)","dnss"=>"mixed","routes"=>"mixed","vms"=>"mixed","users"=>"mixed"],"#nullable"=>["id","ipAddress","dnsName","login","password"],"#notSerializable"=>["dnss","routes","vms","users"],"#transformers"=>["toView"=>["password"=>"Ubiquity\\contents\\transformation\\transformers\\Password"]],"#accessors"=>["id"=>"setId","ipAddress"=>"setIpAddress","dnsName"=>"setDnsName","login"=>"setLogin","password"=>"setPassword","dnss"=>"setDnss","routes"=>"setRoutes","vms"=>"setVms","users"=>"setUsers"],"#oneToMany"=>["dnss"=>["mappedBy"=>"serveur","className"=>"models\\Dns"],"routes"=>["mappedBy"=>"serveur","className"=>"models\\Route"],"vms"=>["mappedBy"=>"serveur","className"=>"models\\Vm"]],"#manyToMany"=>["users"=>["targetEntity"=>"models\\User","inversedBy"=>"serveurs"]],"#joinTable"=>["users"=>["name"=>"userservers","joinColumns"=>["name"=>"id_1","referencedColumnName"=>"id"],"inverseJoinColumns"=>["name"=>"id","referencedColumnName"=>"id"]]]);
