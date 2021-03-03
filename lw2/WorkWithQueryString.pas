PROGRAM WorkWithQueryString(INPUT, OUTPUT);
USES
  DOS;  
FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  QueryString: STRING;
BEGIN {GetQueryStringParameter}
  QueryString := GetEnv('QUERY_STRING');
  {Проверка вхождения в QueryString подстроки Key= или &Key=}
  IF (POS(Key + '=', QueryString) = 1) OR (POS('&' + Key + '=', QueryString) <> 0)
  THEN
    BEGIN
      {Копирование строки QueryString с конца подстроки Key= до конца}
      QueryString := COPY(QueryString, POS(Key + '=', QueryString) + LENGTH(Key + '='), 255);
      {Если в оставшейся строке остался & то копировать только до него}
      IF POS('&', QueryString) <> 0
      THEN
        QueryString := COPY(QueryString, 1, POS('&', QueryString) - 1);
      GetQueryStringParameter := QueryString
    END
  ELSE      
    GetQueryStringParameter := ''    
END; {GetQueryStringParameter}
BEGIN {WorkWithQueryString}
  WRITELN('Content-Type: text/plain');
  WRITELN;     
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))
END. {WorkWithQueryString}