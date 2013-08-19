<?php
/**
 * Contains methods that handle simple search queries
 */

class SimpleSearchResponse
{ 
 
    public static function getSimpleSearchResponse (&$interopController, $baseURL, $catalogue_href, $content_type, $maintainer, $id, $description , $name, $tags){

        //TODO: build search queries
        //$searchURL = _createSearchUrl ($datahub, $content_type, $maintainer, $id, $title, $description , $name, $tags);
        //hard code url... TODO: take datahub into account. 
        $searchURL =$baseURL.$catalogue_href."?";

        $parameter_count =0; 

        if ($id!=null){
            if ($parameter_count>0)
                $searchURL=$searchURL."&&";
            $searchURL=$searchURL."rel=urn:X-smartstreets:rels:hasId"."&val=".$id;
            $parameter_count++;
        }
        if ($content_type!=null){
            if ($parameter_count>0)
                $searchURL=$searchURL."&&";
            $searchURL=$searchURL."rel=urn:X-tsbiot:rels:isContentType"."&val=".$content_type;
            $parameter_count++;
        }
        if ($maintainer!=null){
            if ($parameter_count>0)
                $searchURL=$searchURL."&&";
            $searchURL=$searchURL."rel=urn:X-smartstreets:rels:hasMaintainer"."&val=".$maintainer;
            $parameter_count++;
        }
        if ($description!=null){
            if ($parameter_count>0)
                $searchURL=$searchURL."&&";
            $searchURL=$searchURL."rel=urn:X-tsbiot:rels:hasDescription:en"."&val=".$description;
            $parameter_count++;
        }
        if ($name!=null){
            if ($parameter_count>0)
                $searchURL=$searchURL."&&";
            $searchURL=$searchURL."rurn:X-smartstreets:rels:hasName:en"."&val=".$name;
            $parameter_count++;
        }
        if ($tags!=null){
            if ($parameter_count>0)
                $searchURL=$searchURL."&&";
            $searchURL=$searchURL."rel=urn:X-smartstreets:rels:tags"."&val=".$tags;
            $parameter_count++;
        }
        //TODO: return search response
        $results= $interopController-> searchByParameters($searchURL);

        return $results;
    } 	

    private function _createSearchUrl ($datahub, $content_type, $maintainer, $id, $title, $description , $name, $tags){
        
        //TODO:write a private function for generating search url 
    }
}