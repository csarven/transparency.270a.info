<?php

$config['site']['name']   = 'Transparency International Linked Data'; /* Name of your site. Appears in page title, address etc. */
$config['site']['server'] = 'transparency.270a.info';                /* 'site' in http://site */
$config['site']['path']   = '';                    /* '/foo' in http://site/foo */
$config['site']['theme']  = 'default';             /* 'default' in /var/www/site/theme/default */
$config['site']['logo']   = 'logo_transparency-linked-data.png';       /* 'logo_latc.png' in /var/www/site/theme/default/images/logo_latc.png */

/*
 * Common prefixes for this dataset
 */
$config['prefixes'] = array(
    'rdf'               => 'http://www.w3.org/1999/02/22-rdf-syntax-ns#',
    'rdfs'              => 'http://www.w3.org/2000/01/rdf-schema#',
    'xsd'               => 'http://www.w3.org/2001/XMLSchema#',
    'owl'               => 'http://www.w3.org/2002/07/owl#',
    'dcterms'           => 'http://purl.org/dc/terms/',
    'foaf'              => 'http://xmlns.com/foaf/0.1/',
    'skos'              => 'http://www.w3.org/2004/02/skos/core#',
    'wgs'               => 'http://www.w3.org/2003/01/geo/wgs84_pos#',
    'dcat'              => 'http://www.w3.org/ns/dcat#',
    'dbo'               => 'http://dbpedia.org/ontology/',
    'dbp'               => 'http://dbpedia.org/property/',
    'dbr'               => 'http://dbpedia.org/resource/',
    'sdmx'              => 'http://purl.org/linked-data/sdmx#',
    'sdmx-attribute'    => 'http://purl.org/linked-data/sdmx/2009/attribute#',
    'sdmx-code'         => 'http://purl.org/linked-data/sdmx/2009/code#',
    'sdmx-concept'      => 'http://purl.org/linked-data/sdmx/2009/concept#',
    'sdmx-dimension'    => 'http://purl.org/linked-data/sdmx/2009/dimension#',
    'sdmx-measure'      => 'http://purl.org/linked-data/sdmx/2009/measure#',
    'sdmx-metadata'     => 'http://purl.org/linked-data/sdmx/2009/metadata#',
    'sdmx-subject'      => 'http://purl.org/linked-data/sdmx/2009/subject#',
    'qb'                => 'http://purl.org/linked-data/cube#',
    'year'              => 'http://reference.data.gov.uk/id/year/',
    'void'              => 'http://rdfs.org/ns/void#',

    'tild'              => 'http://transparency.270a.info/',
    'property'          => 'http://transparency.270a.info/property/',
    'classification'    => 'http://transparency.270a.info/classification/',
    'source'            => 'http://transparency.270a.info/classification/source/',
    'country'           => 'http://transparency.270a.info/classification/country/',

    'g-void'               => 'http://transparency.270a.info/graph/void',
    'g-meta'               => 'http://transparency.270a.info/graph/meta',
    'g-cpi'           => 'http://transparency.270a.info/graph/corruption-perceptions-index'
);

/**
 * SPARQL Queries
 */
/* Empty query (temporary) */
$config['sparql_query']['empty'] = '';

/**
 * Default query is DESCRIBE
 * '<URI>' value is auto-assigned from current request URI
 */
$config['sparql_query']['default'] = "
    DESCRIBE <URI>
";
/**
 * Entity Set
 */
/* URI path for this entity */
$config['entity']['default']['path']     = '';
/* SPARQL query to use for this entity e.g., $config['sparql_query']['default'] */
$config['entity']['default']['query']    = 'default';
/* HTML template to use for this entity */
$config['entity']['default']['template'] = 'page.default.html';


$config['sparql_query']['site_home'] = "";
$config['entity']['site_home']['path']     = "/";
$config['entity']['site_home']['query']    = 'site_home';
$config['entity']['site_home']['template'] = 'page.home.html';

$config['entity']['site_about']['path']     = "/about";
$config['entity']['site_about']['query']    = 'empty';
$config['entity']['site_about']['template'] = 'page.about.html';



$config['sparql_query']['classification'] = "
CONSTRUCT {
    <URI> ?p1 ?o1 .
    ?p1 skos:prefLabel ?propertyLabel .
    ?p1 rdfs:label ?propertyLabel .

    ?o1 skos:prefLabel ?conceptLabel .
    ?o1 rdfs:label ?resourceLabel .
    ?o1 dcterms:title ?resourceTitle .
    ?o1 skos:notation ?conceptNotation .
}
WHERE {
    GRAPH <http://transparency.270a.info/graph/meta> {
        <URI> ?p1 ?o1 .
        OPTIONAL {
            { ?p1 skos:prefLabel ?propertyLabel . }
            UNION
            { ?p1 rdfs:label ?propertyLabel . }
        }
        OPTIONAL { ?o1 skos:prefLabel ?conceptLabel . }
        OPTIONAL { ?o1 rdfs:label ?resourceLabel . }
        OPTIONAL { ?o1 dcterms:title ?resourceTitle . }
        OPTIONAL { ?o1 skos:notation ?conceptNotation . }
    }
}

";
$config['entity']['classification']['path']     = '/classification/';
$config['entity']['classification']['query']    = 'classification';
$config['entity']['classification']['template'] = 'page.classification.html';

$config['entity']['property']['path']     = '/property';
$config['entity']['property']['query']    = 'default';
$config['entity']['property']['template'] = 'page.default.html';


$config['sparql_query']['dataset'] = "
CONSTRUCT {
    <URI> ?p1 ?o1 .
    ?p1 skos:prefLabel ?propertyLabel .
    ?p1 rdfs:label ?resourceLabel .

    ?o1 dcterms:title ?title .
    ?o1 skos:prefLabel ?conceptLabel .
    ?o1 rdfs:label ?resourceSchemaLabel .
}
WHERE {
    <URI> ?p1 ?o1 .
    OPTIONAL { ?p1 skos:prefLabel ?propertyLabel . }
    OPTIONAL { ?p1 rdfs:label ?resourceLabel . }
    OPTIONAL { ?o1 skos:prefLabel ?conceptLabel . }
    OPTIONAL { ?o1 dcterms:title ?title . }
    OPTIONAL { ?o1 rdfs:label ?resourceSchemaLabel . }
}
";
$config['entity']['dataset']['path']     = '/dataset';
$config['entity']['dataset']['query']    = 'dataset';
$config['entity']['dataset']['template'] = 'page.default.html';

?>
