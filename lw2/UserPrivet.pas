PROGRAM UserPrivet(INPUT, OUTPUT);
USES
  DOS;
VAR
  Query, Name: STRING;
BEGIN
  Query := GetEnv('QUERY_STRING');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF POS('name=', Query) = 1
  THEN
    BEGIN
      IF POS('&', Query) <> 0
      THEN
        Name := COPY(Query, 6, POS('&', Query))
      ELSE
        Name := COPY(Query, 6, 255);
      WRITELN('Hello dear, ', Name)
    END
  ELSE
    WRITELN('Hello GayFox!')
END.
