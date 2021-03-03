PROGRAM SarahReverse(INPUT, OUTPUT);
USES
  DOS;
VAR
  Lanterns: STRING;
BEGIN {SarahReverse}
  Lanterns := GetEnv('QUERY_STRING');
  WRITELN('Content-Type: text/plain');
  WRITELN;
  IF Lanterns = 'lanterns=1'
  THEN
    WRITELN('The British are coming by land. ')
  ELSE
    IF Lanterns = 'lanterns=2'
    THEN
      WRITELN('The British are coming by sea. ')
    ELSE
      WRITELN('The North Church shows only ''', Lanterns, '''.')
END.
